
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir PDF com PDF.js</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.17.107/pdf.min.js"></script>
    <style>
        #pdf-container {
            width: 100%;
            height: 600px;
            overflow: auto;
            border: 1px solid #ccc;
        }
        canvas {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>PDF com PDF.js</h1>
    <div id="pdf-container"></div>
    <script>
        const url = 'D:/xampp/htdocs/FUMDESQL/public/assets/docs/231124Unidade I.pdf';

        const container = document.getElementById('pdf-container');
        const loadingTask = pdfjsLib.getDocument(url);

        loadingTask.promise.then(pdf => {
            for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                pdf.getPage(pageNum).then(page => {
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    const viewport = page.getViewport({ scale: 1.5 });

                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    container.appendChild(canvas);

                    page.render({
                        canvasContext: context,
                        viewport: viewport
                    });
                });
            }
        }).catch(err => {
            console.error('Erro ao carregar o PDF:', err);
        });
    </script>
</body>
</html>