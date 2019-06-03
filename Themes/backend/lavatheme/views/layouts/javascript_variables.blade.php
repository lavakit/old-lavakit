<script>
    window.Lavakit = {
        locales: {!! json_encode(LaravelLocalization::getSupportedLocales()) !!},
        currentLocale: '{{ locale() }}',
        adminPrefix: '{{ config('base.base.admin-prefix') }}',
        hideDefaultLocale: '{{ config('laravellocalization.hideDefaultLocaleInURL') }}',
        textTranslations: {!! $textTranslations ?? '{}' !!},
        allowRegister: '{{ config('user.user.allow_register') }}',
        created: '{{ crafted() }}',
        version: '{{ config('base.base.version') }}',
        allFrontendTheme: {!! json_encode(\ThemeFrontend::allThemeName()) !!}
    }
</script>