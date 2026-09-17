function copytext(text) {
    const status = document.getElementById('status')
    navigator.clipboard.writeText(text).then(() => {
        status.textContent = 'کپی شد✔';
        setTimeout(() => status.textContent = '', 4000)
    }).catch(err => {
        status.textContent = 'خطا در کپی❌';
        console.error('خطا در کپی:', err)
    })
}