var options = [
    ['bold', 'italic', 'underline', 'strike'],
    ['blockquote', 'code-block'],
    [{'script': 'sub'}, {'script': 'super'}],
    [{'direction': 'rtl'}],
    [{'size': ['small', false, 'large', 'huge']}],
    ['link', 'image', 'video']
]

var quill = new Quill('#quilPost', {
    modules: {
        toolbar: options
    },

    placeholder: 'Digite a Artigo Aqui',
    theme: 'snow'
});

quill.on('text-change', function() {
    document.getElementById("post").value = quill.root.innerHTML;
});