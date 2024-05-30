
<div class="container">

    <h1>REPORTE USUARIOS</h1>

    <button id="generate-pdf" type="button"><img src="{{asset('img/PDF.png')}}" alt="" width="50" height="50"></button>

    <br>
    <br>

    <table class="tg center">
        <thead>
            <tr>
                <th class="tg-qv16">ID</th>
                <th class="tg-qv16">Nombre</th>
                <th class="tg-h2g2">Correo</th>
                <th class="tg-h2g2">Categoria</th>

            </tr>
        </thead>
        <tbody>
            @php
            $counter = 1;
            @endphp
            @foreach ($users as $item)
            <tr>
                <td class="tg-i81m">{{ $counter++ }}</td>
                <td class="tg-i81m">{{$item->name}}</td>
                <td class="tg-i81m">{{$item->email}}</td>
                <td class="tg-i81m">{{$item->phone}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    document.getElementById("generate-pdf").addEventListener("click", function () {
        const element = document.querySelector(".tg.center");

        // Opciones para la generación del PDF
        const pdfOptions = {
            margin: 5,
            filename: "reporte_Usuarios.pdf",
            image: {
                type: "jpeg",
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: "mm",
                format: "a4",
                orientation: "portrait"
            }
        };

        // Generar el PDF
        html2pdf().from(element).set(pdfOptions).save();
    });
</script>





<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-color: #ccc;
        border-spacing: 0;
    }

    .tg td {
        background-color: #fff;
        border-color: #ccc;
        border-style: solid;
        border-width: 1px;
        color: #333;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg th {
        background-color: #f0f0f0;
        border-color: #ccc;
        border-style: solid;
        border-width: 1px;
        color: #333;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg .tg-qv16 {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        vertical-align: top
    }

    .tg .tg-h2g2 {
        background-color: #efefef;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        vertical-align: top
    }

    .tg .tg-i81m {
        background-color: #ffffff;
        text-align: center;
        vertical-align: top
    }
</style>