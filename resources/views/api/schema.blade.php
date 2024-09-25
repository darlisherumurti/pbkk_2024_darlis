@extends('layout.base')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.10.3/swagger-ui.css" />
@endpush
@section('content')
    <div class="card mt-3">

        <div id="swagger-ui"></div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.10.3/swagger-ui-bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.10.3/swagger-ui-standalone-preset.js"></script>
    <script>
        window.onload = function() {
            const ui = SwaggerUIBundle({
                url: "/openapi.json",
                dom_id: '#swagger-ui',
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],
                layout: "StandaloneLayout",
                onComplete: () => {
                    // Set default token here
                    const defaultToken = "17|cUedemTG0l3QK1A8ORPgRChyteLEp0J983bPOWRK494a5e49";
                    ui.preauthorizeApiKey("BearerAuth", defaultToken);
                }
            });
        };
    </script>
@endpush
