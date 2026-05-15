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

require_once('../../config.php');
require_once($CFG->dirroot. '/local/planmatrix/lib.php');


$context = context_system::instance(); // Kontext ist für die Berechtigungen wichtig. Hier wird es immer Systemkontext sein.
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/planmatrix/index.php')); // Bestimmt URL.
$PAGE->set_pagelayout('mydashboard'); // Schmaleres Layout wäre 'standard'.
$PAGE->set_title(get_string('pluginname', 'local_planmatrix')); // Setzt Titel in Browser-Tab, Moodle-Header, Barrierefreiheit.
$PAGE->set_heading(get_string('pluginname', 'local_planmatrix')); // Hier wird der Titel ausgegeben.

// JavaScript für das Dialogfeld laden.
$PAGE->requires->js_call_amd('local_planmatrix/new_matrix_modal', 'init'); 
// $PAGE->requires ist für Unterobjekte für JavaScript und CSS-Anforderungen.
// Es kann eine Breadcrumb-Navigation ergänzt werden. $PAGE->navbar->add(...).

echo $OUTPUT->header(); // Erstes ausgegebenes Element.

$overview = [
    'new' => get_string('new', 'local_planmatrix'),
];

echo $OUTPUT->render_from_template('local_planmatrix/overview', $overview);

echo $OUTPUT->footer(); // Letztes ausgegebene Element.
