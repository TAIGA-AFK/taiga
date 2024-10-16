const getDataUser = async () => {
    
    const form = new FormData();
    const email = document.getElementById('in-email');
    const pass = document.getElementById('in-pass');

    form.append('email', email);
    form.append('password', pass);

    console.log(form);

    try {
        const response = await fetch('../backend/php/login.php', {
            method: 'POST',
            body: form
        });
    
        if (!response.ok) {
            throw new Error('Error en la solicitud');
        }
    
        const userData = await response.json();
        window.location.href = `../../templates/perfil-demo.html?usuario=${encodeURIComponent(JSON.stringify(userData))}`;
    } catch (error) {
        console.error('Error:', error);
    }
}