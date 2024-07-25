<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/blog/ServiceBlog.php';

if(isset($_POST['newBlog'])){
    $response = ServiceBlog::newBlog($_POST['titulo'],$_POST['contenido']);
}

if(isset($_POST['setBlog'])){
    $response = ServiceBlog::setBlog($_GET['blog_edit'], $_POST['titulo'],$_POST['contenido'], $_POST['estado']);
}

if(isset($_POST['setImageBlog'])){
    $response = ServiceBlog::setImageBlog($_GET['blog_edit']);
}

if(isset($_GET['blog_edit'])){
    $blog = ServiceBlog::getBlog($_GET['blog_edit']);
    $img_blog_detail = ServiceBlog::getValidateImageBlog($_GET['blog_edit']);
}

if(isset($_GET['blog_single'])){
    $id_blog       = ServiceBlog::getIdByTitulo($_GET['blog_single']);
    $blogPage      = ServiceBlog::getBlogPage($id_blog);
    $img_blog_detail = ServiceBlog::getValidateImageBlogSingle($id_blog);
    $fechaBlogPage = ServiceBlog::getFechaBlogPage($id_blog);
    $ultimosBlog   = ServiceBlog::getUltimosBlog();
}

if(isset($_POST['deleteBlog'])){
    $response = ServiceBlog::deleteBlog($_GET['blog_edit']);
}

if(isset($_POST['getCardsBlog'])){
    $response = ServiceBlog::getCardsBlog($_POST['inicio']);
    echo $response;
}

if(isset($_POST['getTotalPagination'])){
    $response = ServiceBlog::getTotalPagination();
    echo $response;
}

if(basename($_SERVER['PHP_SELF']) == 'blog.php'){
    $tablaBlog      = ServiceBlog::getTableBlog();
    $paginateBlog   = ServiceBlog::getPaginateBlog();
}

if(isset($_GET)){
    $contadorBlog  = ServiceBlog::getCountBlog();
}
?>