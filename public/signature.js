const canvas = document.getElementById('sig');
const signatureField = document.getElementById('signature_data');
const signatureDrawnField = document.getElementById('signature_drawn');

if (canvas && signatureField && signatureDrawnField) {
    const context = canvas.getContext('2d');
    let drawing = false;
    let hasDrawn = Boolean(signatureField.value && signatureDrawnField.value === '1');

    if (signatureField.value) {
        const existingSignature = new Image();
        existingSignature.onload = () => context.drawImage(existingSignature, 0, 0);
        existingSignature.src = signatureField.value;
    }

    function pointerPosition(event) {
        const rect = canvas.getBoundingClientRect();
        const pointer = event.touches ? event.touches[0] : event;

        return {
            x: (pointer.clientX - rect.left) * (canvas.width / rect.width),
            y: (pointer.clientY - rect.top) * (canvas.height / rect.height),
        };
    }

    function saveSignature() {
        if (hasDrawn) {
            signatureField.value = canvas.toDataURL('image/png');
        }
    }

    function startDrawing(event) {
        event.preventDefault();
        drawing = true;

        const position = pointerPosition(event);
        context.beginPath();
        context.moveTo(position.x, position.y);
    }

    function draw(event) {
        if (!drawing) {
            return;
        }

        event.preventDefault();
        const position = pointerPosition(event);
        hasDrawn = true;
        signatureDrawnField.value = '1';
        context.lineWidth = 2;
        context.lineCap = 'round';
        context.lineTo(position.x, position.y);
        context.stroke();
        saveSignature();
    }

    function stopDrawing() {
        drawing = false;
        saveSignature();
    }

    ['mousedown', 'touchstart'].forEach((eventName) => {
        canvas.addEventListener(eventName, startDrawing);
    });

    ['mousemove', 'touchmove'].forEach((eventName) => {
        canvas.addEventListener(eventName, draw);
    });

    ['mouseup', 'mouseleave', 'touchend'].forEach((eventName) => {
        canvas.addEventListener(eventName, stopDrawing);
    });

    document.getElementById('clearSig').addEventListener('click', () => {
        context.clearRect(0, 0, canvas.width, canvas.height);
        signatureField.value = '';
        signatureDrawnField.value = '';
        hasDrawn = false;
    });

    document.getElementById('ndaForm').addEventListener('submit', () => {
        document.querySelector('button[type=submit]').disabled = true;
        saveSignature();
    });
}
