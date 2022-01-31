module.exports = {
    loadGrid(element) {
        $(element).html(`<div style="display:flex; justify-content:center;">
        <span>Carregando...</span>
    </div>`)
    },

    loadOptionsBtn(element) { 
        $(element).html('<i class="fas fa-spinner"></i>')
    }
}