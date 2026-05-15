<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Main file to view greetings
 *
 * @package     local_planmatrix
 * @copyright   2026 Nicole Wehrlein <nicole.wehrlein@gmx.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Ermöglicht die Bearbeitung des Formulars und speichert die Daten

require_once('../../config.php');


$context = context_system::instance(); // Kontext ist für die Berechtigungen wichtig. Hier wird es immer Systemkontext sein.
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/planmatrix/edit.php')); // Bestimmt URL.
$PAGE->set_pagelayout('standard'); // Schmaleres Layout wäre 'standard'.
$PAGE->set_title(get_string('pluginname', 'local_planmatrix')); // Setzt Titel in Browser-Tab, Moodle-Header, Barrierefreiheit.
$PAGE->set_heading(get_string('pluginname', 'local_planmatrix')); // Hier wird der Titel ausgegeben.

// JavaScript für das Dialogfeld laden.
$PAGE->requires->js_call_amd('local_planmatrix/matrix_editor', 'init'); 
// $PAGE->requires ist für Unterobjekte für JavaScript und CSS-Anforderungen.
// Es kann eine Breadcrumb-Navigation ergänzt werden. $PAGE->navbar->add(...).

$form = new \local_planmatrix\form\matrix_edit_form();

if ($form->is_cancelled()) {
    redirect(new moodle_url('/local/planmatrix/index.php'));
} else if ($data = $form->get_data()) {
    // Hier später speichern.
    redirect(new moodle_url('/local/planmatrix/index.php'));
}

ob_start();
$form->display();
$formhtml = ob_get_clean();

$templatecontext = [
    'formhtml' => $formhtml,
];


echo $OUTPUT->header(); // Erstes ausgegebenes Element.

echo $OUTPUT->render_from_template('local_planmatrix/matrix_edit', $templatecontext);

echo $OUTPUT->footer(); // Letztes ausgegebene Element.

