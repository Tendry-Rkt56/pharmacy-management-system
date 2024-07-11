const limit = document.getElementById('limit')

limit.addEventListener('input', () => {
     if (limit.value <= 0) limit.value = 1
})