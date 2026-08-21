<?php

/*  Licencia de Uso No Transferible                                       */
/**************************************************************************/
/*                        This file is part of:                           */
/*                              Tiny                                      */
/*                 https://github.com/armindeck/tiny                      */
/**************************************************************************/
/* Copyright (c) 2026 Armin Deck                                          */
/*                                                                        */
/* Se concede permiso, de forma gratuita, a cualquier persona para usar,  */
/* modificar y ejecutar el código fuente de este software, incluyendo su  */
/* uso en proyectos comerciales (como monetización por publicidad o       */
/* donaciones).                                                           */
/*                                                                        */
/* Restricciones estrictas:                                               */
/* - No está permitido vender, sublicenciar o distribuir el código        */
/*   fuente —total o parcialmente— con fines de lucro.                    */
/* - No está permitido convertir el código en privativo ni eliminar       */
/*   esta licencia.                                                       */
/* - No está permitido reclamar la autoría del código original.           */
/*                                                                        */
/* Uso permitido:                                                         */
/* - Se permite modificar y usar el código con fines personales,          */
/*   educativos y/o comerciales, siempre que no se venda.                 */
/* - Se permite usar este software como base para otros proyectos,        */
/*   siempre que esta licencia se mantenga.                               */
/*                                                                        */
/* El autor Armin Deck se reserva el derecho de modificar esta            */
/* licencia en futuras versiones del software.                            */
/*                                                                        */
/* EL SOFTWARE SE ENTREGA "TAL CUAL", SIN GARANTÍAS DE NINGÚN TIPO,       */
/* EXPRESAS O IMPLÍCITAS, INCLUYENDO, SIN LIMITACIÓN, GARANTÍAS DE        */
/* COMERCIABILIDAD, IDONEIDAD PARA UN PROPÓSITO PARTICULAR Y NO           */
/* INFRACCIÓN. EN NINGÚN CASO LOS AUTORES SERÁN RESPONSABLES POR          */
/* RECLAMACIONES, DAÑOS U OTRAS RESPONSABILIDADES, YA SEA EN UNA ACCIÓN   */
/* CONTRACTUAL, EXTRACONTRACTUAL O DE OTRO TIPO, DERIVADAS DE O EN        */
/* CONEXIÓN CON EL SOFTWARE, SU USO O OTRO TIPO DE MANEJO.                */
/**************************************************************************/

namespace Model;

class Model {
    private static string $path_data = RAIZ . "/data/";

    public static function read(string $file_path): array {
        if (!file_exists($file_path)) {
            throw new \Exception("File not found: " . $file_path);
        }
        $content = file_get_contents($file_path);
        return json_decode($content, true) ?? [];
    }

    public static function write(string $file_path, array $data): bool {
        $json_data = json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        if ($json_data === false) {
            throw new \Exception("Failed to encode data to JSON.");
        }
        return file_put_contents($file_path, $json_data) !== false;
    }

    public static function getPathFileData(): string {
        return self::$path_data;
    }

    public static function getPathFileConfig(): string {
        return self::getPathFileData() . "config.json";
    }

    public static function getPathFileCore(): string {
        return self::getPathFileData() . "core.json";
    }

    public static function getPathFileDashboard(): string {
        return self::getPathFileData() . "dashboard.json";
    }

    public static function getPathFilePosts(): string {
        return self::getPathFileData() . "posts.json";
    }

    public static function getPathFileComments(): string {
        return self::getPathFileData() . "comments.json";
    }

    public static function getPathFileUsers(): string {
        return self::getPathFileData() . "users.json";
    }

    public static function getPathFileTemplate(): string {
        return self::getPathFileData() . "template.json";
    }

    public static function getPathFileTimezone(): string {
        return self::getPathFileData() . "timezone.json";
    }

    public static function getPathFileVisits(): string {
        return self::getPathFileData() . "visits.json";
    }

    public static function getPathFileTranslate(): string {
        return self::getPathFileData() . "translate.json";
    }
}