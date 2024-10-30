<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Basic styling for the body and header */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        
        .table-header {
            margin-bottom: 20px;
        }
        
        .table-header h2 {
            font-size: 24px;
            margin: 0;
            color: #4CAF50; /* Green color for the title */
        }
        
        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #f1f1f1;
        }
        
        /* Button styling */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .btn:hover {
            background-color: #45a049;
        }
        
        /* Print styles */
        @media print {
            .btn {
                display: none; /* Hide the print button when printing */
            }
            
            table {
                border-collapse: collapse;
                width: 100%;
            }
            
            th, td {
                border: 1px solid #000;
                padding: 8px;
            }
            
            th {
                background-color: #f4f4f4;
            }
        }
    </style>
</head>
<body>
<div class="table-header">
        <h2>Laporan Barang Masuk</h2>
        <br>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID barang</th>
                <th>Nama Supplier</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang_masuk as $barangmasuk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barangmasuk->barang->nama_barang }}</td>
                    <td>{{ $barangmasuk->supplier->nama_supplier }}</td>
                    <td>{{ $barangmasuk->jumlah }}</td>
                    <td>{{ $barangmasuk->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="javascript:window.print()" class="btn">Cetak Laporan</a>
</body>
</html>