<head>
     <style>
        /* Custom CSS for the responsive image container and image */
        .custom-container {
            padding: 20px; /* Add some padding around the container */
        }

        .custom-image-wrapper {
            text-align: center; /* Center the image inside the container */
        }

        .full-width-image {
            width: 100%; /* Make the image take up the full width of the container */
            height: auto; /* Maintain the aspect ratio of the image */
            border: 2px solid #ddd; /* Optional: Add a border to the image */
            border-radius: 10px; /* Optional: Add rounded corners to the image */
        }
     </style>
</head>
    <!-- Responsive image container -->
    <div class="custom-container my-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="custom-image-wrapper">
                    <img src="{{ asset('site/img/roadmap.png') }}" alt="Roadmap" class="full-width-image">
                </div>
            </div>
        </div>
    </div>
