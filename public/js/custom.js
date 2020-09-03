/**
 * create the main constants
 */
/*****************************
 *   CONSTANT DECLARATIONS
 ****************************/
const addForm = document.querySelector('form.addPost');     // form to enter a new todo
const postRows = document.querySelector('.postRows');
const searchForm = document.querySelector('form.search');   // form to search for a todo

/*****************************
 *    Method expressions
 ****************************/
const listTodos = () => {

    axios
    .get('/admin/posts/all')
    .then( response => {
        const posts = response.data;
        posts.forEach( post => addPost(post.title, post.content, post.id));
    })
    .catch(err => console.log(err));
};

/**
 * 
 * @param {*} title 
 * @param {*} content 
 * @param {*} id 
 */
const addPost = (title, content, id = null) => {

    const html = `
        <tr data-target="${id}">
            <th scope="row">${id}</th>
            <th>${title}</th>
            <th>${content}</th>
            <th><a href="/admin/posts/" + ${id} + "/edit" class="btn btn-warning">Edit</a></th>
            <th><button class="btn btn-danger delete">Delete</button></th>
        </tr>
    `;
    postRows.innerHTML += html;
};


/**
 * Add new todo
 * when the user enter a todo in the form field
 * we must get the text that is in the input and put in a varialble
 * this same text is what will go to the database;
 */
addForm.addEventListener('submit', function(e) {

    e.preventDefault();         
    console.log("submiting post");
    console.log(this.title.value);
    console.log(this.content.value);
    axios
    .post('/admin/posts/store', { 
        title: this.title.value,
        content: this.content.value,
    })
    .then( response => {
        console.log(response.data);
        if(response.statusText == "Created"){
            addPost(response.data.title, response.data.content, response.data.id);
            addForm.reset(); // clear the form fields
        } 
    })
    .catch(err => console.log(err));

});



/**
 * Deleting a post
 */
postRows.addEventListener('click', e => {

    console.log(e);
    const ID = e.target.parentElement.parentElement.getAttribute('data-target'); // this is has the item ID
    const targetedList = e.target;                                 // this is the element we clicked

    // check if we clicked on the delete icon
    if(targetedList.classList.contains('delete')) {

        // console.log(e.target.parentElement.parentElement);
        console.log(ID);
        axios
        .delete(`/admin/posts/${ID}/delete`)
        .then(res => {
            if(res.statusText === 'OK'){
                targetedList.parentElement.parentElement.remove();
            }
        })
        .catch(err => alert("Something went wrong. Possible API connection issue"));
    }
});





