<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('admin/assets/images/logo-icon.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('admin/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('admin/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('admin/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('admin/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://unpkg.com/simple-keyboard@latest/build/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-keyboard/3.1.1/simple-keyboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simple-keyboard/3.1.1/simple-keyboard.js"></script>
    <title>@yield('title')</title>
</head>
<style>
    /* Change keyboard background */
.simple-keyboard {
    background-color: #000 !important; /* Black background for the keyboard */
    color: #fff !important; /* White text color */
    left: 130.375px !important;

}

/* Style individual keys */
.simple-keyboard .hg-button {
    background-color: #333; /* Dark grey key background */
    color: #fff; /* White text for keys */
    border: 1px solid #444; /* Border to distinguish keys */
}

/* Change background color of keys on hover */
.simple-keyboard .hg-button:hover {
    background-color: #555; /* Lighter grey for hover effect */
}

/* Style special keys (e.g., backspace, enter) */
.simple-keyboard .hg-button[data-skbtn="{bksp}"],
.simple-keyboard .hg-button[data-skbtn="{enter}"] {
    background-color: #666; /* Different color for special keys */
    color: #fff;
}

/* Adjust font size if needed */
.simple-keyboard .hg-button {
    font-size: 1.1em; /* Adjust font size for readability */
}


/* .simple-keyboard {
    position: absolute !important;
    top: 1454.12px !important;
    left: 130.375px !important;
    display: block !important;

} */
</style>



<body class="bg-theme bg-theme2">
    <!--wrapper-->
    <div class="wrapper">
        @include('officer.layouts.sidebar')

        @include('officer.layouts.header')

        <!-- Left side column. contains the logo and sidebar -->

        @yield('content')
        @include('officer.layouts.footer')
        @include('officer.layouts.theme')


        <script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
        <!--plugins-->
        <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/validation/validation-script.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://unpkg.com/simple-keyboard@latest/build/index.js"></script>
        @stack('js')


        @include('officer.layouts.validation')
        <script>
            $(document).ready(function() {
                $('#example2').DataTable({
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        ["10", "25", "50", "All"]
                    ],
                    "searching": true,
                    "paging": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "scrollX": true, // Enables horizontal scroll bar for smaller screens
                    "responsive": false // Prevents hiding columns automatically
                });
            });
        </script>
{{-- Marathi keyboard start --}}


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let activeInput; // Track the currently active input field

        // Initialize the keyboard
        const keyboard = new SimpleKeyboard.default({
            onChange: input => {
                // Update the input field only if there is an active input
                if (activeInput) {
                    activeInput.value = input; // Set the input field's value
                }
            },
            onKeyPress: button => {
                if (button === "{bksp}") {
                    // Handle backspace properly for active input
                    if (activeInput && activeInput.value.length > 0) {
                        activeInput.value = activeInput.value.slice(0, -1);
                        keyboard.setInput(activeInput.value); // Sync keyboard with the field's current value
                    }
                }
            },
            layout: {
                'default': [
                    '१ २ ३ ४ ५ ६ ७ ८ ९ ० -',
                    'क ख ग घ ङ च छ ज झ ञ',
                    'ट ठ ड ढ ण त थ द ध न',
                    'प फ ब भ म य र ल व श',
                    'ष स ह ळ क्ष त्र ज्ञ',
                    '{space} ि ी ु ू ृ े ै ो ौ ं ः ा ्'
                ]
            },
            display: {
                '{bksp}': '⌫',
                '{enter}': 'Enter',
                '{shift}': 'Shift',
                '{space}': 'Space',
            }
        });

        // Function to show the keyboard below the active input field
        function showKeyboard() {
            if (activeInput) {
                const rect = activeInput.getBoundingClientRect();
                const keyboardElement = document.querySelector('.simple-keyboard'); // Adjust selector based on your keyboard's class
                keyboardElement.style.position = 'absolute';
                keyboardElement.style.top = `${rect.bottom + window.scrollY}px`; // Position it below the input field
                keyboardElement.style.left = `${rect.left}px`; // Align with the input field
                keyboardElement.style.display = 'block'; // Show the keyboard
            }
        }

        // Function to handle input focus
        function handleFocus(field) {
            activeInput = field; // Set the focused input as active
            keyboard.setInput(field.value || ''); // Sync the keyboard with the input value
            showKeyboard(); // Show keyboard when input is focused
        }

        // Add focus event listener to all Marathi input fields
        document.querySelectorAll('.marathi-input').forEach(field => {
            field.addEventListener('focus', function() {
                handleFocus(field); // Handle focus for the field
            });

            field.addEventListener('input', function() {
                // Update keyboard input value when the input field changes
                if (activeInput) {
                    keyboard.setInput(field.value); // Sync keyboard with the current value of the input field
                }
            });
        });

        // Hide keyboard on form submission
        document.getElementById('certificateForm').addEventListener('submit', function() {
            activeInput = null; // Clear active input
            document.querySelector('.simple-keyboard').style.display = 'none'; // Hide the keyboard
        });

        // Optional: Hide keyboard when clicking outside (remove if not needed)
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.marathi-input') && !event.target.closest('.simple-keyboard')) {
                // If clicking outside the input or keyboard, hide the keyboard
                activeInput = null; // Clear active input
                document.querySelector('.simple-keyboard').style.display = 'none'; // Hide the keyboard
            }
        });

        // Prevent keyboard from hiding on input field click
        document.querySelectorAll('.marathi-input').forEach(field => {
            field.addEventListener('click', function() {
                if (activeInput === field) {
                    // If clicking on the same input, do nothing to keep the keyboard open
                    showKeyboard(); // Ensure keyboard is shown if the same field is clicked
                } else {
                    handleFocus(field); // Handle focus for the new field
                }
            });
        });

        // Prevent the keyboard from closing on key press
        keyboard.addKeyEventListener('keypress', function() {
            showKeyboard(); // Keep the keyboard visible on key press
        });
    });
</script>


<style>
    .simple-keyboard {
        display: none; /* Hide the keyboard by default */
        z-index: 1000; /* Ensure the keyboard appears above other content */
    }
</style>







        <!--app JS-->
        <script src="{{asset('admin/assets/js/app.js')}}"></script>

</body>

</html>
