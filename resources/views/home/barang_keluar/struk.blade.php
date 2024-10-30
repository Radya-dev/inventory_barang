<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .receipt {
            width: 80mm; /* Width for receipt printers */
            margin: 10mm auto; /* Center the receipt with margin */
            padding: 5mm; /* Padding inside the receipt */
            border: 1px solid #ddd; /* Border around the entire receipt */
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            box-sizing: border-box; /* Include border and padding in element's total width and height */
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 5mm; /* Margin below the header */
        }

        .receipt-header h1 {
            margin: 0;
            font-size: 14px; /* Adjust font size for better fit */
            color: #333;
        }

        .receipt-header p {
            margin: 0;
            font-size: 10px; /* Adjust font size for better fit */
            color: #666;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5mm; /* Margin below the table */
        }

        .receipt-table td {
            padding: 2mm; /* Padding inside table cells */
            border-bottom: 1px solid #ddd; /* Border between rows */
            font-size: 10px; /* Adjust font size for better fit */
        }

        .receipt-table .value {
            text-align: right;
        }

        .receipt-table tr.separator td {
            border-bottom: 2px solid #000; /* Thick separator line */
        }

        .text-center {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 4px 8px;
            margin: 2px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            font-weight: bold;
            font-size: 10px; /* Adjust font size for better fit */
            text-align: center;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-info:hover, .btn-warning:hover {
            opacity: 0.8;
        }

        /* Print styles */
        @media print {
            body {
                margin: 0;
            }

            .receipt {
                width: 80mm; /* Width for receipt printers */
                padding: 0; /* Remove padding for print layout */
                border: 1px solid #ddd; /* Border around the entire receipt */
                box-shadow: none;
                box-sizing: border-box;
            }

            .receipt-table td {
                border-bottom: 1px solid #000; /* Make borders more visible when printing */
            }

            .btn {
                display: none; /* Hide buttons when printing */
            }

            .receipt-header, .receipt-table, .text-center {
                margin: 0;
                padding: 0;
            }

            /* Ensure the separator line is visible on print */
            .receipt-table tr.separator td {
                border-bottom: 2px solid #000; /* Thick separator line */
            }
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="receipt-header">
            <h1>FastDirect</h1>
            <p>Barang Keluar</p>
        </div>
        <table class="receipt-table">
            <tbody>
                <!-- ID Barang Keluar and Customer Details -->
                 <tr>
                    <td><label>ID Barang Keluar:</label></td>
                    <td class="value">{{ $barang_keluar->id }}</td>
                 </tr>
                 <tr>
                    <td><label>Nama Customer:</label></td>
                    <td class="value">{{ $barang_keluar->nama_customer }}</td>
                 </tr>
                 <tr>
                    <td><label>ID Barang:</label></td>
                    <td class="value">{{ $barang_keluar->barang->id }}</td>
                 </tr>
                 <tr>
                    <td><label>Nama Barang:</label></td>
                    <td class="value">{{ $barang_keluar->barang->nama_barang }}</td>
                 </tr>
                 <tr>
                    <td><label>Jumlah:</label></td>
                    <td class="value">{{ $barang_keluar->jumlah }}</td>
                 </tr>
                 <tr>
                    <td><label>Harga per Item:</label></td>
                    <td class="value">{{ 'Rp' . number_format($barang_keluar->barang->harga_beli, 0, ',','.') }}</td>
                 </tr>

                 <!-- Separator line -->
                  <tr class="separator">
                     <td colspan="2"></td>
                  </tr>

                  <!-- Total and Payment Date -->
                   <tr>
                     <td><label>Total:</label></td>
                     <td class="value">{{ 'Rp' . number_format($barang_keluar->jumlah * $barang_keluar->barang->harga_beli, 0, ',','.') }}</td>
                   </tr>
                   <tr>
                     <td><label>Tanggal Pembayaran:</label></td>
                     <td class="value">{{ $tgl_pembayaran }}</td>
                   </tr>

                   <!-- Footer -->
                    <tr>
                     <td colspan="2" class="text-center">
                        <strong>Terima Kasih</strong><br>
                        <small>{{ $barang_keluar->nama_customer }}</small>
                     </td>
                    </tr>
                  </tbody>
        </table>
    </div>
    <br>
    <div class="text-center">
      <a class="btn btn-info" href="/barang_keluar">Kembali</a>
      <a href="javascript:window.print()" class="btn btn-warning">Cetak Struk</a>
    </div>
</body>
</html>
