<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
<link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="asset/aos/css/aos.css">
<script src="asset/jquery/jquery.min.js"></script>
<script type="text/javascript">
    function fixAspect(img) {
        var $img = $(img),
            width = $img.width(),
            height = $img.height(),
            tallAndNarrow = width / height < 1;
        if (tallAndNarrow) {
            $img.addClass('tallAndNarrow');
        }
        $img.addClass('loaded');
    }
</script>