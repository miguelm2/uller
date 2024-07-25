<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Blog.php';

class ServiceBlog extends System
{

    public static function newBlog($titulo, $contenido)
    {
        try {

            $titulo  = parent::limpiarString($titulo);
            $contenido = htmlentities($contenido);
            $fecha_registro = date('Y-m-d H:i:s');

            $id_usuario = $_SESSION['id'];
            $tipo_usuario = $_SESSION['tipo'];

            $source         = $_FILES['imagenblog']['tmp_name'];
            $filename       = $_FILES['imagenblog']['name'];
            $fileSize       = $_FILES['imagenblog']['size'];


            if ($fileSize > 100 & $filename != '') {

                $dir_blog =  $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_BLOG;

                if (!file_exists($dir_blog)) mkdir($dir_blog, 0777, true);
                $dir            = opendir($dir_blog); //Abrimos el directorio de destino
                $trozo1         = explode(".", $filename);

                $imagen = 'blog_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
                $target_path    = $dir_blog . '/' . $imagen; //Indicamos la ruta de destino, así como el nombre del archivo
                move_uploaded_file($source, $target_path);
                closedir($dir);
            }

            $result = Blog::newBlog($id_usuario, $tipo_usuario, $titulo, ($contenido), $imagen, "IMG", $fecha_registro);
            if ($result) return '<script>swal("' . Constants::$MESSAGE_NEW_BLOG . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function setBlog($id_blog, $titulo, $contenido, $estado)
    {
        try {

            $id_blog  = parent::limpiarString($id_blog);
            $titulo  = parent::limpiarString($titulo);
            $contenido = htmlentities($contenido);
            $estado = parent::limpiarString($estado);
            $result = Blog::setBlog($id_blog, $titulo, $contenido, $estado);
            if ($result) return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }




    public static function setImageBlog($id_blog)
    {
        try {
            $id_blog  = parent::limpiarString($id_blog);

            $blogDTO =  Blog::getBlog($id_blog);

            if (!empty($blogDTO->getImagen()) && $blogDTO->getTipo_imagen() == "IMG") {
                $dir_blog =  $_SERVER['DOCUMENT_ROOT'] . Constants::$DIR_IMAGE_BLOG . $blogDTO->getImagen();
                unlink($dir_blog);
            }

            $source         = $_FILES['updateImgBlog']['tmp_name'];
            $filename       = $_FILES['updateImgBlog']['name'];
            $fileSize       = $_FILES['updateImgBlog']['size'];


            if ($fileSize > 100 & $filename != '') {

                $dir_blog =  $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_BLOG;

                if (!file_exists($dir_blog)) mkdir($dir_blog, 0777, true);
                $dir            = opendir($dir_blog); //Abrimos el directorio de destino
                $trozo1         = explode(".", $filename);

                $imagen = 'blog_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
                $target_path    = $dir_blog . '/' . $imagen; //Indicamos la ruta de destino, así como el nombre del archivo
                move_uploaded_file($source, $target_path);
                closedir($dir);
            }


            $result = Blog::setImageBlog($id_blog, $imagen, "IMG");
            if ($result) return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }





    public static function getBlog($id_blog)
    {
        try {
            $id_blog  = parent::limpiarString($id_blog);
            $blogDTO =  Blog::getBlog($id_blog);
            return $blogDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }




    public static function deleteBlog($id_blog)
    {
        $id_blog  = parent::limpiarString($id_blog);

        try {
            $blogDTO =  Blog::getBlog($id_blog);

            if (!empty($blogDTO->getImagen())) {
                $dir_blog =  $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_BLOG . $blogDTO->getImagen();
                unlink($dir_blog);
            }

            $result = Blog::deleteBlog($id_blog);
            if ($result) header('Location:blog?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function getTableBlogUser()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == "blog.php") {
                $id_usuario = $_SESSION['id'];
                $tableHtml = "";
                $modelResponse = Blog::listBlogUser($id_usuario);

                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_creacion() . '</td>';
                    $tableHtml .= '<td align="center">' . Elements::crearBotonVer('blog_edit', $valor->getId_blog()) . '</td>';
                    $tableHtml .= '</tr>';
                }
                return $tableHtml;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getTableBlog()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'blog.php') {
                $tableHtml = "";
                $modelResponse = Blog::listBlog();

                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getIdUsuario()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_creacion() . '</td>';
                    $tableHtml .= '<td align="center">' . Elements::crearBotonVer('blog_edit', $valor->getId_blog()) . '</td>';
                    $tableHtml .= '</tr>';
                }
                return $tableHtml;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public static function getCardsBlog($inicio)
    {
        try {
            $inicio = parent::limpiarString($inicio);
            $TagHTML= '';

            $modelResult = Blog::listBlogHome($inicio);
            foreach ($modelResult as $valor) {
                $TagHTML .= Elements::getCardBlog(
                    $valor->getId_blog(),
                    $valor->getIdUsuario()->getNombre(),
                    $valor->getImagen(),
                    $valor->getTipo_imagen(),
                    $valor->getTitulo(),
                    date_format(date_create($valor->getFecha_creacion()), 'Y-m-d')
                );
            }
            return json_encode($TagHTML);
        } catch (\Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getUltimosBlog()
    {
        $TagHTML = "";
        $modelResult = Blog::listUltimosBlog();
        foreach ($modelResult as $valor) {
            if (strlen($valor->getTitulo()) > 50) {
                $aux = substr($valor->getTitulo(), 0, 50) . '...';
            } else {
                $aux = $valor->getTitulo();
            }
            $TagHTML .= Elements::getBlogsRecientes(
                $valor->getId_blog(),
                $valor->getImagen(),
                $valor->getTipo_imagen(),
                $aux,
                date_format(date_create($valor->getFecha_creacion()), 'Y-m-d'),
                $valor->getTitulo()
            );
        }
        return $TagHTML;
    }

    public static function getIdByTitulo($titulo)
    {
        try {
            $titulo = parent::limpiarString($titulo);

            $id_blog = Blog::getIdBlogByTitulo($titulo);

            return $id_blog;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function getBlogPage($id_blog)
    {
        try {
            $id_blog = parent::limpiarString($id_blog);
            $blogDTO = Blog::getBlog($id_blog);
            $vistasBlog = Blog::getVisitasBlog($id_blog);

            Blog::setNumeroVistasBlog($id_blog, ($vistasBlog + 1));

            return $blogDTO;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getFechaBlogPage($id_blog)
    {
        try {
            $id_blog = parent::limpiarString($id_blog);
            $blogDTO = Blog::getBlog($id_blog);

            return Elements::getFechaLetras(date_format(date_create($blogDTO->getFecha_creacion()), 'Y-m-d'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function getCountBlog()
    {
        try {
            $total = Blog::getCountBlog();
            return $total;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getValidateImageBlog($id_blog)
    {
        try {
            $id_blog = parent::limpiarString($id_blog);
            $blogDTO = Blog::getBlog($id_blog);
            if ($blogDTO->getTipo_imagen() == "IMG") {
                $imagen = Constants::$DIR_IMAGE_BLOG . $blogDTO->getImagen();
            } else {
                $imagen = "data:image/png;base64," . $blogDTO->getImagen();
            }

            return $imagen;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getValidateImageBlogSingle($id_blog)
    {
        try {
            $id_blog = parent::limpiarString($id_blog);
            $blogDTO = Blog::getBlog($id_blog);
            if ($blogDTO->getTipo_imagen() == "IMG") {
                $imagen = Constants::$DIR_IMAGE_BLOG . $blogDTO->getImagen();
            } else {
                $imagen = "data:image/png;base64," . $blogDTO->getImagen();
            }

            return $imagen;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTotalPagination()
    {
        try {
            $totalBlogs = Blog::getCountBlogByEstado();
            $numBotons = ceil(($totalBlogs / 6));

            return json_encode($numBotons);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getPaginateBlog()
    {
        try {
            $html = '';
            $btn  = '';
            $totalBlogs = Blog::getCountBlogByEstado();

            if ($totalBlogs > 6) {
                $numBotons = ceil(($totalBlogs / 6));

                for ($i = 1; $i <= $numBotons; $i++) {
                    $btn .= Elements::getBotonPaginacion($i);
                }

                $html = Elements::getPaginacion($btn);
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
