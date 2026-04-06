document.addEventListener('DOMContentLoaded', () => {
    const marketSelect = document.getElementById('market');
    const symbolSelect = document.getElementById('sym');

    const defaultSymbols = {
        'Forex': 'EURUSD',
        'Crypto': 'BTCUSDT',
        'Stocks': 'AMD'
    };

    function filterSymbols(market) {
        [...symbolSelect.options].forEach(option => {
            option.hidden = option.dataset.market !== market;
        });
        symbolSelect.value = defaultSymbols[market] || '';
    }

    // Initial load
    filterSymbols(marketSelect.value);

    // On market change
    marketSelect.addEventListener('change', e => {
        filterSymbols(e.target.value);
    });
});