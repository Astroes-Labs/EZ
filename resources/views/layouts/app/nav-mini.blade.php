<ul class="dropdown-menu dropdown-menu-end">
  <li>
    <a href="{{ route('account.info.edit') }}" onclick="openCustom(event, this)" class="dropdown-item" type="button">
      <i class="anticon anticon-setting"></i>Settings
    </a>
  </li>

  <li>
    <a href="{{ route('avatar.edit') }}" onclick="openCustom(event, this)" class="dropdown-item" type="button">
      <i class="anticon anticon-picture"></i>Update Avatar
    </a>
  </li>
  <li>
    <a href="{{ route('email.update') }}" onclick="openCustom(event, this)" class="dropdown-item" type="button">
      <i class="anticon anticon-mail"></i>Update Email
    </a>
  </li>
  <li>
    <a href="{{ route('password.update') }}" onclick="openCustom(event, this)" class="dropdown-item" type="button">
      <i class="anticon anticon-lock"></i>Change Password
    </a>
  </li>
  <li>
    <a href="../user/support-ticket-index.html" class="dropdown-item" type="button">
      <i class="anticon anticon-customer-service"></i>Support Tickets
    </a>
  </li>
  <li class="logout">
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
      @csrf
      <input type="hidden" name="logout" value="logout">
      <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();" class="dropdown-item">
        <i class="anticon anticon-logout"></i>Logout
      </a>
    </form>
  </li>
</ul>