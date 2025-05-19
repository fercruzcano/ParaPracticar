function loadImage(url) {
    return new Promise(resolve => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const res = event.target.result;
                resolve(res);
            }
            const file = this.response;
            reader.readAsDataURL(file);
        }
        xhr.send();
    });
}

let signaturePad  = null;

window.addEventListener('load', () => {


    const canvas = document.querySelector("canvas");
    canvas.height = canvas.offsetHeight;
    canvas.width = canvas.offsetWidth;

    signaturePad = new SignaturePad(canvas, {});

    const form = document.querySelector('#form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let nombre = document.getElementById('nombre').value;
        let puesto = document.getElementById('puesto').value;
        let dia = document.getElementById('dia').value;

        generatePDF(nombre, puesto, dia);

    }) 

});

async function generatePDF(nombre, puesto, dia) {
    const image = await loadImage("FORMATO.jpg");
    
    /*ATRAPAMOS LA IMAGEN DEL FORMULARIO*/
    const signatureImage = signaturePad.toDataURL();

    const pdf = new jsPDF('p','pt','letter');

    pdf.addImage (image,'PNG',0,0,565, 792);
    
    /*ALADIR LA FIRMA AL PDF CON COORDENADAS*/
    /***************************** ESTA ES PARA LA FIRMA DEL DIRECTOR *************************************/
    pdf.addImage(signatureImage, 'PNG', 10, 500, 200, 60);

    /****************************** FIRMA DEL JEFE DE AREA **************************************/
    /*pdf.addImage(signatureImage, 'PNG', 10, 500, 500, 60);*/

    /******************************* FIRMA DEL TRABAJADOR ***************************************/
    /**/
   
    

    



    /*ALADIRL el texto al pdf*/
    pdf.setFontSize(12);
    pdf.text(nombre, 110, 219); 

    /*ALADIRL el nombre abajo de la firma*/
    pdf.setFontSize(9);
    pdf.text(nombre, 315, 532);

    /*315 para moverlo horizontal*/
     /*532 para moverlo vertical*/

    const date = new Date();
    pdf.text(date.getUTCDate().toString(), 365, 165);
    pdf.text((date.getUTCMonth() + 1).toString(), 435, 165);

    pdf.setFontSize(12);
    pdf.text(puesto, 200, 237);

    pdf.setFontSize(12);
    pdf.text(dia, 260, 280);

    pdf.setFillColor(0,0,0);
    pdf.circle(50, 274, 4, 'FD');

    pdf.save("Example.pdf");
}