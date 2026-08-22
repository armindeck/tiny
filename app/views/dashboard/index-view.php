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

$menu = view("dashboard.components.menu", [
    "open_menu" => $open_menu ?? false,
    "section" => $section ?? "",
    "sections" => $sections ?? [],
    "section_exists" => $section_exists ?? false
], return: true);

if(empty($section)){
    $section_view = ""; // Dev
} elseif(empty($section_exists) || !file_exists(__DIR__."/sections/".($section ?? "")."-view.php")) {
    $section_view = view("dashboard.components.section-not-found", [
        "section" => $section ?? "",
        "sections" => $sections ?? [],
    ], return: true);
} else {
    $section_view = view("dashboard.sections.".($section ?? ""), [
        "section" => $section ?? "",
        "sections" => $sections ?? [],
    ], return: true);
}

$extruct = <<<HTML
    <div class="flex flex-column gap-8">
        $menu
        $section_view
    </div>
HTML;

view("layout", [
    "layout" => $extruct,
    "app_style" => $app_style ?? "",
    "title" => $title ?? "",
    "app_lang" => $app_lang ?? "en",
]);
