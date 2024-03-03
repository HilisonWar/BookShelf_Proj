
<div id="app">
<header class="header-container">

    <div class="user-name-container">
        <div class="avatar-container"> 

        </div>

        <label><?php echo Auth::user()["name"] ?></label>
    </div>
    
    <div class="logout-container">

        <form method="POST" action="logout">
            @csrf {{ csrf_field() }}
        <button type="submit">Выйти</button>
    </form>

    </div>

</header>

<main class="main-container">

    <div class="books-container">

        <div class="books-container-title">
            Общий список книг
        </div>
        <button v-on:click="isAddingBook = true">Добавить книгу</button>
        <div class="adding-book-form" v-if="isAddingBook == true">
                <label>Название книги</label>
                <input type="text" v-model="addingBook.name">
                <label>Описание</label>
                <input type="text" v-model="addingBook.description">
                <label>Автор</label>
                <select class="author-selector" v-model="addingBook.author_id">
                        <option v-for="author in authors_array"  v-bind:value="author.id">
                               @{{author.fio}}
                        </option>
                </select>   

                <label>Жанр</label>
                <select class="genre-selector" v-model="addingBook.article_id">
                        <option v-for="genre in geners_array"  v-bind:value="genre.id">
                                @{{genre.name}}
                        </option>
                </select>  

                <label>Год издания</label>
                <input type="number" maxlength="4" v-model="addingBook.publication_year">

                <button v-on:click="AddBook">Добавить</button>
                <button v-on:click="isAddingBook = false">Отмена</button>
        </div>
        <div  v-for="book in books">
            <label>@{{book.name}}</label>
            <label>@{{book.description}}</label>
            <label>@{{book.publicationYear}}</label>
            <button v-if="book.user_id == {{Auth::user()['id']}} || {{Auth::user()['role_id'] }} == 2" v-on:click="isEdited = true, editedBook = book">
                Редактировать
            </button>
        </div>

        <div class="book-edit-form" v-if="isEdited">
            <label>Название книги</label>
            <input type="text" v-model="editedBook.name">
            <label>Описание</label>
            <input type="text" v-model="editedBook.description">
            <button v-on:click = "EditBook">Изменить</button>
            <button v-on:click = "isEdited = false; editedBook = null">Отмена</button>
        </div>

    </div>

</main>

<footer class="footer-container">

</footer>

</div>

<style>

    html
    {
        height: 100%;
        width:100%;
    }

    body
    {
        height: 100%;
        width:100%;
        margin:0;
    }

    .header-container
    {
        height: 10%;
        width: 100%;
        display:grid;
        grid-template-columns: 3fr 1fr;
        background-color: rgb(145, 145, 206);
    }

    .user-name-container
    {
        height: 100%;
        width: 100%;
    }

    .books-container
    {
        width:100%;
        height: 100%;
        background-color:rgb(157, 157, 184);
    }

    .main-container
    {
        width: 100%;
        height: 80%;
    }

    .footer-container
    {
        width: 100%;
        height: 10%;
    }

</style>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>

<script>
  var app = new Vue({
  el: '#app',
  data: {
    books:[],
    geners_array:[],
    authors_array:[],
    user:null,
    addingBook:null,
    editedBook:null,
    isEdited:false,
    isAddingBook:false
  },

  mounted()
  {
    this.addingBook = {
        name : null,
        description:null,
        publication_year:0,
        author_id: 1,
        article_id:1
    };

     this.GetBooks();
  },

  methods:
  {
        async GetBooks()
        {
                await axios.get("/books")
                    .then(response =>
                    {
                        this.books = response.data;
                        this.GetGenersOfBooks();
                    });
        },

        async GetGenersOfBooks()
        {
            await axios.get("/books/articles")
                .then(response =>
                {
                        this.geners_array = response.data;
                        this.GetAuthorsOfBooks();
                })
        },

        async GetAuthorsOfBooks()
        {
            await axios.get("/books/authors")
                .then(response =>
                {
                        this.authors_array = response.data;
                })
        },


        async EditBook()
        {
            console.log(this.editedBook);

            await axios.put("/books",this.editedBook)
                .then(response =>
                {
                    console.log(response.data);

                    this.GetBooks();
                })
        },

        async AddBook()
        {

            console.log(this.addingBook);

                await axios.post("/books",this.addingBook)
                    .then(response =>
                    {
                        console.log(response);

                        this.GetBooks();
                    })
        }
  }
})

</script>

