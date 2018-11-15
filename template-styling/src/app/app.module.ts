import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PostsComponent } from './posts/posts.component';

import { AuthorService } from './services/author.service';
import { PostService } from './services/post.service';
import { PostComponent } from './post/post.component';
import { TimeagoPipe } from './timeago.pipe';

@NgModule({
  declarations: [
    AppComponent,
    PostsComponent,
    PostComponent,
    TimeagoPipe
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [
    AuthorService,
    PostService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
