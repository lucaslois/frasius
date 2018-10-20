var urlQuotes = 'http://localhost:8000/api/quotes';
var urlAuthors = 'http://localhost:8000/api/authors';

var app = new Vue({
    el: '#app',
    created:function() {
        this.getQuotes();
        axios.get(urlAuthors).then(response => {
           this.authors = response.data;
        });
    },
    data: {
        quotes: [],
        formCreate: [],
        formEdit: [],
        authors: []
    },
    methods: {
        openCreateModal: function() {
            $("#createModal").modal();
        },
        openEditModal: function(quote) {
            $("#editModal").modal();
            this.formEdit = quote;
        },
        getQuotes: function() {
            axios.get(urlQuotes).then(response => {
               this.quotes = response.data.data
            });
        },

        sendQuote: function() {
            console.log(this.formCreate['text']);
            let btn = document.querySelector('#btnSendQuote');
            btn.disabled = true;

            axios.post(urlQuotes, {
                text: this.formCreate['text'],
                source: this.formCreate['source'],
                author: this.formCreate['author']
            }).then(response => {
                this.quotes.unshift(response.data.data);
                $("#createModal").modal('hide');
                btn.disabled = false;
                this.formCreate = [];

                alertify.alert("The quote has been created correctly!");
            });
        },
        updateQuote: function() {
            let btn = document.querySelector('#btnUpdateQuote');
            btn.disabled = true;

            axios.put(urlQuotes + '/' + this.formEdit['id'], {
                text: this.formEdit['text'],
                source: this.formEdit['source'],
                author: this.formEdit['author']
            }).then(response => {
                $("#editModal").modal('hide');
                btn.disabled = false;
                this.formCreate = [];

                alertify.alert("The quote has been updated!");
            });
        },
        deleteQuote: function(quote) {
            axios.delete(`${urlQuotes}/${quote.id}`).then(response => {
                let index = this.quotes.indexOf(quote);
                this.quotes.splice(index, 1);
            });
        }
    }
})