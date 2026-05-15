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
 * Main file to view planmatrix
 *
 * @package     local_planmatrix
 * @copyright   2026 Nicole Wehrlein <nicole.wehrlein@gmx.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_planmatrix\form;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class matrix_edit_form extends \moodleform {

    public function definition() {
        $mform = $this->_form;
// Thema.
        $mform->addElement(
            'text',
            'topic',
            get_string('topic', 'local_planmatrix')
        );
        $mform->setType('topic', PARAM_TEXT);
        $mform->addRule(
            'topic',
            get_string('required'),
            'required',
            null,
            'client'
        );

// Kurs.

        $mform->addElement(
            'text',
            'kurs',
            get_string('kurs', 'local_planmatrix'),
        );
        $mform->setType('kurs', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);

// Klassenstufe.

        $mform->addElement(
            'text',
            'matrix_klassenstufe',
            get_string('matrix_klassenstufe', 'local_planmatrix'),
        );
        $mform->setType('matrix_klassenstufe', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);       

// Mitwirkende.

        $mform->addElement(
            'text',
            'contributors',
            get_string('contributors', 'local_planmatrix'),
        );
        $mform->setType('contributors', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);    

// Status.

        $mform->addElement(
            'text',
            'matrix_status',
            get_string('matrix_status', 'local_planmatrix'),
        );
        $mform->setType('matrix_status', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);    

// Zeitrahmen.

        $mform->addElement(
            'text',
            'matrix_time',
            get_string('matrix_time', 'local_planmatrix'),
        );
        $mform->setType('matrix_time', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);    

// Übergeordnete Idee.

        $mform->addElement(
            'text',
            'matrix_ubergeordneteidee',
            get_string('matrix_ubergeordneteidee', 'local_planmatrix'),
        );
        $mform->setType('matrix_ubergeordneteidee', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);    

// Verortung im Bildungsplan.

        $mform->addElement(
            'text',
            'matrix_verortung-bp',
            get_string('matrix_verortung-bp', 'local_planmatrix'),
        );
        $mform->setType('matrix_verortung-bp', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);    

// inhaltsbezogene/prozessbezogene Kompetenzen.

        $mform->addElement(
            'text',
            'matrix_kompetenzen',
            get_string('matrix_kompetenzen', 'local_planmatrix'),
        );
        $mform->setType('matrix_kompetenzen', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);   

// Groblernziel.

        $mform->addElement(
            'text',
            'matrix_groblernziel',
            get_string('matrix_groblernziel', 'local_planmatrix'),
        );
        $mform->setType('matrix_groblernziel', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey());
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);     

// Skizze der Unterrichtseinheit.
        $mform->addElement(
            'text',
            'matrix_skizze',
            get_string('matrix_skizze', 'local_planmatrix'),
        );
        $mform->setType('matrix_skizze', PARAM_TEXT);

        $mform->addElement('hidden', 'sesskey', sesskey()
        );
        $mform->setType('sesskey', PARAM_ALPHANUMEXT);

// HTML Tabelle 
    $mform->addElement(
    'html',
    '<div id="local-planmatrix-editor"></div>'
);
// Verstecktes Feld für spätere JSON-Daten.
    $mform->addElement('hidden', 'matrixdata');
    $mform->setType('matrixdata', PARAM_RAW);

$this->add_action_buttons(true, get_string('savechanges'));
    }

// Validierung
    public function validation($data, $files) {
        $errors = parent::validation($data, $files);

        if (trim($data['topic']) === '') {
            $errors['topic'] = get_string('required');
        }

        return $errors;
    }
// Speichern-Button unten.

}
