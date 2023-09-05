<!DOCTYPE html>
<html lang="vi">
<head>
    @include('admin.components.head')
</head>
<body>
    @include('admin.components.loader')
    @include('admin.components.nav')
    @include('admin.components.header')
    <?php echo $main; ?>
    @include('admin.components.modal')
    @include('admin.components.script')
</body>
</html>