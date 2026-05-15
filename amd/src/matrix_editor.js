// erzeugt und verwaltet die dynamische Tabelle der Matrixzeilen

define(['jquery'], function($) {

    const init = function() {
        const editor = $('#local-planmatrix-editor');

        editor.html(`
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Phase</th>
                        <th>Zeit</th>
                        <th>Inhalt</th>
                        <th>Methode</th>
                        <th>Material</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Einstieg</td>
                        <td>10 Min</td>
                        <td>Vorwissen aktivieren</td>
                        <td>Gespräch</td>
                        <td>Tafel</td>
                    </tr>
                </tbody>
            </table>
        `);
    };

    return {
        init: init
    };
});