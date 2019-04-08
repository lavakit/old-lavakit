<script>
    window.Lavakit = {
        locales: {!! json_encode(LaravelLocalization::getSupportedLocales()) !!},
        currentLocale: '{{ locale() }}',
        adminPrefix: '{{ config('base.base.admin-prefix') }}',
        hideDefaultLocale: '{{ config('laravellocalization.hideDefaultLocaleInURL') }}',
        textTranslations: {!! $textTranslations ?? '' !!},
        logo: '{{ backendAsset('images/brand-white.png') }}',
        created: '{{ crafted() }}',
        version: '{{ config('base.base.version') }}',
        pageTitle: '{!! title()->get(false) !!}'
    }
</script>