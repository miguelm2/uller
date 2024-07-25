<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/BlogDTO.php';

class Blog extends system
{

    public static function newBlog($id_usuario, $tipo_usuario, $titulo, $contenido, $imagen, $tipo_imagen, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Blog (id_usuario, tipo_usuario, titulo, vistas, contenido, imagen, tipo_imagen, estado, fecha_creacion) 
                                VALUES (:id_usuario, :tipo_usuario, :titulo, '0', :contenido, :imagen, :tipo_imagen, '1', :fecha_creacion)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':tipo_imagen', $tipo_imagen);
        $stmt->bindParam(':fecha_creacion', $fecha_registro);
        return  $stmt->execute();
    }


    public static function setBlog($id_blog, $titulo, $contenido, $estado)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Blog SET titulo = :titulo, contenido = :contenido, estado = :estado WHERE id_blog = :id_blog");
        $stmt->bindParam(':id_blog', $id_blog);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':estado', $estado);
        return  $stmt->execute();
    }


    public static function setImageBlog($id_blog, $imagen, $tipo_imagen)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Blog SET imagen = :imagen, tipo_imagen = :tipo_imagen WHERE id_blog = :id_blog");
        $stmt->bindParam(':id_blog', $id_blog);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':tipo_imagen', $tipo_imagen);
        return  $stmt->execute();
    }




    public static function getBlog($id_blog)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Blog WHERE id_blog = :id_blog");
        $stmt->bindParam(':id_blog', $id_blog);
        $stmt->execute();
        $result = $stmt->fetch();

        $blogDTO = new BlogDTO();
        $blogDTO->setId_blog($result['id_blog']);
        if ($result['tipo_usuario'] && $result['tipo_usuario'] != 5) {
            $blogDTO->setIdUsuario(Usuario::getUserById($result['id_usuario']));
        } else {
            $blogDTO->setIdUsuario(Administrador::getAdministradorById($result['id_usuario']));
        }
        $blogDTO->setTipoUsuario($result['tipo_usuario']);
        $blogDTO->setTitulo($result['titulo']);
        $blogDTO->setVistas($result['vistas']);
        $blogDTO->setContenido($result['contenido']);
        $blogDTO->setImagen($result['imagen']);
        $blogDTO->setTipo_imagen($result['tipo_imagen']);
        $blogDTO->setEstado($result['estado']);
        $blogDTO->setFecha_creacion($result['fecha_creacion']);

        return $blogDTO;
    }


    public static function listBlogUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Blog WHERE id_usuario = :id_usuario AND tipo_usuario = '1' ORDER BY fecha_creacion DESC");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $lstBlog = array();
        $cont = 0;

        foreach ($result as $r) {
            $blogDTO = new BlogDTO();
            $blogDTO->setId_blog($r['id_blog']);
            if ($r['tipo_usuario'] && $r['tipo_usuario'] != 5) {
                $blogDTO->setIdUsuario(Usuario::getUserById($r['id_usuario']));
            } else {
                $blogDTO->setIdUsuario(Administrador::getAdministradorById($r['id_usuario']));
            }
            $blogDTO->setTipoUsuario($r['tipo_usuario']);
            $blogDTO->setTitulo($r['titulo']);
            $blogDTO->setVistas($r['vistas']);
            $blogDTO->setContenido($r['contenido']);
            $blogDTO->setImagen($r['imagen']);
            $blogDTO->setTipo_imagen($r['tipo_imagen']);
            $blogDTO->setEstado($r['estado']);
            $blogDTO->setFecha_creacion($r['fecha_creacion']);

            $lstBlog[$cont] = $blogDTO;
            $cont++;
        }

        return $lstBlog;
    }


    public static function listBlog()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Blog ORDER BY fecha_creacion DESC");
        $stmt->execute();
        $result = $stmt->fetchAll();

        $lstBlog = array();
        $cont = 0;

        foreach ($result as $r) {
            $blogDTO = new BlogDTO();
            $blogDTO->setId_blog($r['id_blog']);
            if ($r['tipo_usuario'] && $r['tipo_usuario'] != 5) {
                $blogDTO->setIdUsuario(Usuario::getUserById($r['id_usuario']));
            } else {
                $blogDTO->setIdUsuario(Administrador::getAdministradorById($r['id_usuario']));
            }
            $blogDTO->setTipoUsuario($r['tipo_usuario']);
            $blogDTO->setTitulo($r['titulo']);
            $blogDTO->setVistas($r['vistas']);
            $blogDTO->setContenido($r['contenido']);
            $blogDTO->setImagen($r['imagen']);
            $blogDTO->setTipo_imagen($r['tipo_imagen']);
            $blogDTO->setEstado($r['estado']);
            $blogDTO->setFecha_creacion($r['fecha_creacion']);

            $lstBlog[$cont] = $blogDTO;
            $cont++;
        }

        return $lstBlog;
    }


    public static function listBlogHome($inicio)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Blog WHERE estado = 1 ORDER BY 1 DESC LIMIT " . $inicio . ",6");
        $stmt->execute();
        $result = $stmt->fetchAll();

        $lstBlog = array();
        $cont = 0;

        foreach ($result as $r) {
            $blogDTO = new BlogDTO();
            $blogDTO->setId_blog($r['id_blog']);
            if ($r['tipo_usuario'] && $r['tipo_usuario'] != 5) {
                $blogDTO->setIdUsuario(Usuario::getUserById($r['id_usuario']));
            } else {
                $blogDTO->setIdUsuario(Administrador::getAdministradorById($r['id_usuario']));
            }
            $blogDTO->setTipoUsuario($r['tipo_usuario']);
            $blogDTO->setTitulo($r['titulo']);
            $blogDTO->setVistas($r['vistas']);
            $blogDTO->setContenido($r['contenido']);
            $blogDTO->setImagen($r['imagen']);
            $blogDTO->setTipo_imagen($r['tipo_imagen']);
            $blogDTO->setEstado($r['estado']);
            $blogDTO->setFecha_creacion($r['fecha_creacion']);

            $lstBlog[$cont] = $blogDTO;
            $cont++;
        }

        return $lstBlog;
    }

    public static function listUltimosBlog()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Blog WHERE estado = 1 ORDER BY 1 DESC LIMIT 4");
        $stmt->execute();
        $result = $stmt->fetchAll();

        $lstBlog = array();
        $cont = 0;

        foreach ($result as $r) {
            $blogDTO = new BlogDTO();
            $blogDTO->setId_blog($r['id_blog']);
            if ($r['tipo_usuario'] && $r['tipo_usuario'] != 5) {
                $blogDTO->setIdUsuario(Usuario::getUserById($r['id_usuario']));
            } else {
                $blogDTO->setIdUsuario(Administrador::getAdministradorById($r['id_usuario']));
            }
            $blogDTO->setTipoUsuario($r['tipo_usuario']);
            $blogDTO->setTitulo($r['titulo']);
            $blogDTO->setVistas($r['vistas']);
            $blogDTO->setContenido($r['contenido']);
            $blogDTO->setImagen($r['imagen']);
            $blogDTO->setTipo_imagen($r['tipo_imagen']);
            $blogDTO->setEstado($r['estado']);
            $blogDTO->setFecha_creacion($r['fecha_creacion']);

            $lstBlog[$cont] = $blogDTO;
            $cont++;
        }

        return $lstBlog;
    }


    public static function deleteBlog($id_blog)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Blog WHERE id_blog = :id_blog");
        $stmt->bindParam(':id_blog', $id_blog);
        return  $stmt->execute();
    }

    public static function getVisitasBlog($id_blog)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Blog WHERE id_blog = :id_blog");
        $stmt->bindParam(':id_blog', $id_blog);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['vistas'];
    }

    public static function setNumeroVistasBlog($id_blog, $vistas)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Blog SET vistas = :vistas WHERE id_blog = :id_blog");
        $stmt->bindParam(':id_blog', $id_blog);
        $stmt->bindParam(':vistas', $vistas);
        return  $stmt->execute();
    }

    public static function getCountBlogByEstado()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(id_blog) AS 'total' FROM Blog WHERE estado = 1");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }

    public static function getCountBlog()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(*) as total FROM Blog");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }

    public static function getCountBlogsUsuario($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(*) as total FROM Blog WHERE id_usuario = '$id_usuario' AND tipo_usuario = 1");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }

    public static function getIdBlogByTitulo($titulo)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT id_blog AS 'id' FROM Blog WHERE titulo = :titulo");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['id'];
    }
}
