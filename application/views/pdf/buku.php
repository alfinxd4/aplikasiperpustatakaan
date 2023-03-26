<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Rekayasatu</title>
    <style>
        h2 {
            text-align: center;
        }

        #table {
            margin-top: 3em;
            border-collapse: collapse;
            width: 100%;
        }

        #table thead tr th {
            text-align: center;
        }

        #table td,
        #table th {
            text-align: center;
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #ddd;
            color: #000;
        }
    </style>
</head>

<body>

    <h2>Laporan Data Member Perpusrekayasatu</h2>
    <table border="1" id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Buku </th>
                <th>Pengarang</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            // get data from tb member, connect to controller member
            foreach ($buku->result() as $row) :
                $count++;
            ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row->kode_buku; ?></td>
                    <td><?php echo $row->pengarang; ?></td>
                    <td><?php echo $row->deskripsi; ?></td>
                <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>