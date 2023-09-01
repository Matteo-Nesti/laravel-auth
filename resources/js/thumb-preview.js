
const thumbField = document.getElementById('thumb-field')
const thumbPreview = document.getElementById('thumb-preview')

const place = 'https://www.comune.foggia.it/wp-content/uploads/2021/03/placeholder.png'

thumbField.addEventListener('input', () => {
    if (thumbField.value) {
        thumbPreview.src = thumbField.value
    } else {
        thumbPreview.src = place;
    }

})
