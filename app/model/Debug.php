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

class Debug {
    private static array $list = [];

    public static function run(bool $active = false): string {
        if(!$active) return "";

        $html = <<<HTML
            <style type="text/css">
                .debug {
                    display: flex;
                    flex-direction: column;
                    border: 1px solid rgba(0,0,0,.5);
                    border-radius: 4px;
                    font-family: Arial, sans-serif;
                    margin: 8px 0;
                }

                .debug header {
                    padding: 8px;
                    text-align: center;
                    color: white;
                    font-weight: bold;
                    background-color: red;
                }

                .debug-content {
                    padding: 4px;
                    color: white;
                    background-color: #222222;
                }

                .debug-content ul {
                    display: flex;
                    gap: 4px;
                    list-style: none;
                    padding: 0;
                    margin: 0;
                }

                .debug-content ul li {
                    font-size: small;
                    padding: 4px 6px;
                    border-radius: 4px;
                    background-color: #4b4a4a;
                }

                .debug-content ul li .key {
                    font-weight: bold;
                }
            </style>
            <div class="debug">
                <header>DEBUG</header>
                <div class="debug-content">
                    <ul>
        HTML;

        foreach (self::$list as $key => $value) {
            $html .= "<li><span class=\"key\">{$key}:</span> <span class=\"value\">{$value}</span></li>";
        }

        $html .= <<<HTML
                    </ul>
                </div>
            </div>
        HTML;

        return $html;
    }

    public static function set(array $list): void {
        self::$list = $list;
    }

    public static function setDefault(): void {
        self::$list = [
            "slug" => slug(),
            "login" => 0,
            "id_user_login" => "¿?"
        ];
    }
}