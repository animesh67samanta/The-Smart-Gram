<?php

return [
    // Show warnings
    'show_warnings' => false, // Throw an Exception on warnings from dompdf
    'orientation' => 'portrait',

    // Paths
    'font_dir' => storage_path('fonts/'), // Path to the fonts directory
    'font_cache' => storage_path('fonts/'), // Path to the cache directory for fonts
    'temp_dir' => storage_path('temp/'), // Path to temporary files for dompdf
    'chroot' => base_path(), // Safe directory (base path) for dompdf

    // Font settings
    'enable_font_subsetting' => false,
    'pdf_backend' => 'CPDF',
    'default_media_type' => 'screen',
    'default_paper_size' => 'a4',
    'default_font' => 'serif',

    // Custom fonts
    'font_family' => [
    'custom-font' => [
        'normal' => storage_path('fonts/NotoSansDevanagari-Regular.ttf'),
        'bold' => storage_path('fonts/NotoSansDevanagari-Bold.ttf'),
        // Add other styles if necessary
    ],
],

    // Features
    'enable_font_subsetting' => true,
    'enable_php' => false,
    'enable_remote' => false,
    'enable_css_float' => false,
    'enable_javascript' => true,

    // Debug settings
    'debug_png' => false,
    'debug_keep_temp' => false,
    'debug_css' => false,

    // Image DPI settings
    'dpi' => 96,
    'font_height_ratio' => 1.1,
    'is_html5_parser_enabled' => true,
    'is_remote_enabled' => false,
    'is_php_enabled' => false,
    'is_javascript_enabled' => true,
    'is_font_subsetting_enabled' => false,

    // Remote file access
    'allowed_remote_hosts' => [],

    // Log output file
    'log_output_file' => null, // Optional log file

    /**
     * The location of a temporary directory.
     *
     * The directory specified must be writable by the web server process.
     * The temporary directory is required to download remote images and when
     * using the PDFLib back end.
     */
    'temp_dir' => sys_get_temp_dir(),

    /**
     * dompdf's "chroot": Prevents dompdf from accessing system files or other
     * files on the webserver. All local files opened by dompdf must be in a
     * subdirectory of this directory. DO NOT set it to '/' since this could
     * allow an attacker to use dompdf to read any files on the server. This
     * should be an absolute path.
     * This is only checked on command line call by dompdf.php, but not by
     * direct class use like:
     * $dompdf = new DOMPDF();  $dompdf->load_html($htmldata); $dompdf->render(); $pdfdata = $dompdf->output();
     */
    'chroot' => realpath(base_path()),

    /**
     * Protocol whitelist
     *
     * Protocols and PHP wrappers allowed in URIs, and the validation rules
     * that determine if a resource may be loaded. Full support is not guaranteed
     * for the protocols/wrappers specified by this array.
     *
     * @var array
     */
    'allowed_protocols' => [
        'file://' => ['rules' => []],
        'http://' => ['rules' => []],
        'https://' => ['rules' => []],
    ],

    /**
     * Operational artifact (log files, temporary files) path validation
     */
    'artifactPathValidation' => null,

    /**
     * @var string
     */
    'log_output_file' => null,

    /**
     * Whether to enable font subsetting or not.
     */
    'enable_font_subsetting' => false,

    /**
     * The PDF rendering backend to use
     *
     * Valid settings are 'PDFLib', 'CPDF' (the bundled R&OS PDF class), 'GD' and
     * 'auto'. 'auto' will look for PDFLib and use it if found, or if not it will
     * fall back on CPDF. 'GD' renders PDFs to graphic files.
     * {@link * Canvas_Factory} ultimately determines which rendering class to
     * instantiate based on this setting.
     *
     * Both PDFLib & CPDF rendering backends provide sufficient rendering
     * capabilities for dompdf, however additional features (e.g. object,
     * image and font support, etc.) differ between backends.  Please see
     * {@link PDFLib_Adapter} for more information on the PDFLib backend
     * and {@link CPDF_Adapter} and lib/class.pdf.php for more information
     * on CPDF. Also see the documentation for each backend at the links
     * below.
     *
     * The GD rendering backend is a little different than PDFLib and
     * CPDF. Several features of CPDF and PDFLib are not supported or
     * do not make any sense when creating image files.  For example,
     * multiple pages are not supported, nor are PDF 'objects'.  Have a
     * look at {@link GD_Adapter} for more information.  GD support is
     * experimental, so use it at your own risk.
     *
     * @link http://www.pdflib.com
     * @link http://www.ros.co.nz/pdf
     * @link http://www.php.net/image
     */
    'pdf_backend' => 'CPDF',

    /**
     * html target media view which should be rendered into pdf.
     * List of types and parsing rules for future extensions:
     * http://www.w3.org/TR/REC-html40/types.html
     *   screen, tty, tv, projection, handheld, print, braille, aural, all
     * Note: aural is deprecated in CSS 2.1 because it is replaced by speech in CSS 3.
     * Note, even though the generated pdf file is intended for print output,
     * the desired content might be different (e.g. screen or projection view of html file).
     * Therefore allow specification of content here.
     */
    'default_media_type' => 'screen',

    /**
     * The default paper size.
     *
     * North America standard is "letter"; other countries generally "a4"
     *
     * @see CPDF_Adapter::PAPER_SIZES for valid sizes ('letter', 'legal', 'A4', etc.)
     */
    'default_paper_size' => 'a4',

    /**
     * The default paper orientation.
     *
     * The orientation of the page (portrait or landscape).
     *
     * @var string
     */
    'default_paper_orientation' => 'portrait',

    /**
     * The default font family
     *
     * Used if no suitable fonts can be found. This must exist in the font folder.
     *
     * @var string
     */
    'default_font' => 'serif',

    /**
     * Image DPI setting
     *
     * This setting determines the default DPI setting for images and fonts. The
     * DPI may be overridden for inline images by explicitly setting the
     * image's width & height style attributes (i.e. if the image's native
     * width is 600 pixels and you specify the image's width as 72 points,
     * the image will have a DPI of 600 in the rendered PDF. The DPI of
     * background images can not be overridden and is controlled entirely
     * via this parameter.
     *
     * For the purposes of DOMPDF, pixels per inch (PPI) = dots per inch (DPI).
     * If a size in html is given as px (or without unit as image size),
     * this tells the corresponding size in pt.
     * This adjusts the relative sizes to be similar to the rendering of the
     * html page in a reference browser.
     *
     * In pdf, always 1 pt = 1/72 inch
     *
     * Rendering resolution of various browsers in px per inch:
     * Windows Firefox and Internet Explorer:
     *   SystemControl->Display properties->FontResolution: Default:96, largefonts:120, custom:?
     * Linux Firefox:
     *   about:config *resolution: Default:96
     *   (xorg screen dimension in mm and Desktop font dpi settings are ignored)
     *
     * Take care about extra font/image zoom factor of browser.
     *
     * In images, <img> size in pixel attribute, img css style, are overriding
     * the real image dimension in px for rendering.
     *
     * @var int
     */
    'dpi' => 96,

    /**
     * Enable embedded PHP
     *
     * If this setting is set to true then DOMPDF will automatically evaluate embedded PHP contained
     * within <script type="text/php"> ... </script> tags.
     *
     * ==== IMPORTANT ==== Enabling this for documents you do not trust (e.g. arbitrary remote html pages)
     * is a security risk.
     * Embedded scripts are run with the same level of system access available to dompdf.
     * Set this option to false (recommended) if you wish to process untrusted documents.
     * This setting may increase the risk of system exploit.
     * Do not change this settings without understanding the security implications.
     * @var bool
     */
    'enable_php' => false,

    /**
     * Enable remote file access
     *
     * If this setting is set to true then DOMPDF will automatically download remote images
     * from external domains. This setting can also be controlled per-image using the `@dompdf` directive
     * within the image's HTML markup.
     *
     * This setting should be enabled if you are generating PDFs that contain images from remote sources.
     * @var bool
     */
    'enable_remote' => false,

    /**
     * Enable or disable the Javascript functionality
     *
     * If this setting is set to true then DOMPDF will automatically process Javascript.
     * However, this functionality is experimental and may not work as expected. Use it at your own risk.
     *
     * @var bool
     */
    'enable_javascript' => true,

    /**
     * Enable or disable the CSS float functionality
     *
     * If this setting is set to true then DOMPDF will support CSS float.
     * However, this functionality is experimental and may not work as expected. Use it at your own risk.
     *
     * @var bool
     */
    'enable_css_float' => false,

    /**
     * Enable or disable default font subsetting
     *
     * This will determine if the PDF will include only the glyphs that are used in the document,
     * reducing the file size but limiting the font support to those glyphs.
     * @var bool
     */
    'enable_font_subsetting' => false,
];
