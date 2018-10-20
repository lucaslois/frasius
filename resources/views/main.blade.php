<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frasius</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/alertify/css/alertify.css') }}">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="main">
                <div class="div">
                    <img class="logo" src="{{ asset('images/logo.png') }}" alt=""> <br>
                    <button v-on:click="openCreateModal" class="btn btn-green btn-sm">Add new quote</button>
                    <div style="margin-bottom: 5px;"></div>
                </div>
                <div class="line"></div>

                <div class="quotes">
                    <transition-group name="list" tag="div">
                        <div class="quote" v-bind:key="quote" v-for="quote in quotes">
                            <p class="text">@{{ quote.text }}</p>
                            <p class="extra">— @{{ quote.source }}, @{{ quote.author }}</p>
                            <div class="text-lg-right">
                                <div class="options">
                                    <a href="#" v-on:click="openEditModal(quote)">Edit</a> - s
                                    <a href="#" v-on:click="deleteQuote(quote)">Delete</a>
                                </div>
                            </div>
                        </div>
                    </transition-group>
                </div>
            </div>
        </div>

        <div id="createModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create new quote</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formSendQuote">
                            <div class="form-group">
                                <label for="text">Quote</label>
                                <input v-model="formCreate['text']" id="text" name="text" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="author">Author / Character</label>
                                <input list="lista" v-model="formCreate['author']" id="author" name="author" type="text" class="form-control">
                                <datalist id="lista">
                                    <option v-for="author in authors" :value="author">
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="source">Source</label>
                                <input v-model="formCreate['source']" id="source" name="source" type="text" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btnSendQuote" type="button" class="btn btn-primary" v-on:click="sendQuote">Send my quote!</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="editModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit quote</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formUpdateQuote">
                            <div class="form-group">
                                <label for="text">Quote</label>
                                <input v-model="formEdit['text']" id="text" name="text" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input v-model="formEdit['author']" id="author" name="author" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="source">Source</label>
                                <input v-model="formEdit['source']" id="source" name="source" type="text" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btnUpdateQuote" type="button" class="btn btn-primary" v-on:click="updateQuote">Save quote</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('plugins/alertify/alertify.js') }}"></script>
</html>