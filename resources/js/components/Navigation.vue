<template>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <a class="navbar-brand" href="#">App</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <router-link :to="{name:'home'}" class="nav-item nav-link " exact
                        >Home <span class="sr-only">(current)</span></router-link
                    >
                    
                    <router-link :to="{name:'pages.about'}" class="nav-item nav-link">About</router-link>
                    <router-link :to="{name:'pages.contact'}" class="nav-item nav-link">Contact</router-link>
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Note
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link :to="{name:'notes.table'}" class="dropdown-item">Note List</router-link>
                        <router-link :to="{name:'notes.create'}" class="dropdown-item">New Note</router-link>
                       </div>
                </li>
                </div>
            </div>
            </div>
        </nav>
</template>

<script>
export default {

};
</script>
