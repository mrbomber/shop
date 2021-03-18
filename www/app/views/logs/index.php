<!-- Main Content -->
<main class="content">
    <div class="header-list-page">
        <h1 class="title"><b>Logs</b></h1>

    </div>
    <?php if (isset($_SESSION["success"])) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            Row updated!
        </div>
    <?php } ?>
    <table class="data-grid">
        <tr class="data-row">
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Date</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Type</span>
            </th>

            <th class="data-grid-th">
                <span class="data-grid-cell-content">Local</span>
            </th>

            <th class="data-grid-th">
                <span class="data-grid-cell-content">Row</span>
            </th>

            <th class="data-grid-th">
                <span class="data-grid-cell-content">Login</span>
            </th>

            <th class="data-grid-th">
                <span class="data-grid-cell-content">Ip Adress</span>
            </th>
        </tr>
        <?php foreach ($data['logs'] as $key => $value) : ?>
            <tr class="data-row">
                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['datetime']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['type']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['local']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['row']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['login']; ?></span>
                </td>
                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['ip']; ?></span>
                </td>


            </tr>
        <?php endforeach; ?>

    </table>
</main>
<!-- Main Content -->