
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div id="{{ $chart['container_id'] }}"></div>
        <script type="text/javascript">
            new TradingView.widget({
                width: "100%",
                height: "100%",
                symbol: "{{ $chart['symbol'] }}",
                timezone: "Etc/UTC",
                theme: "dark",
                style: "1",
                locale: "en",
                toolbar_bg: "#f1f3f6",
                enable_publishing: false,
                range: "YTD",
                container_id: "{{ $chart['container_id'] }}"
            });
        </script>
    </div>
    <!-- TradingView Widget END -->
