<script>    
    toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
    <?php if (session()->has('message')) : ?>       
        toastr.success('<?= session('message') ?>');
    <?php endif ?>    
    <?php if (session()->has('success')) : ?>       
        toastr.success('<?= session('success') ?>');
    <?php endif ?> 
    <?php if (session()->has('error')) : ?>      
        toastr.error('<?= session('error') ?>');
    <?php endif ?>  
        <?php if (session()->has('info')) : ?>
        toastr.info('<?= session('info') ?>');
    <?php endif ?>   
    <?php if (session()->has('warning')) : ?>
        toastr.warning('<?= session('warning') ?>');
    <?php endif ?> 
</script>