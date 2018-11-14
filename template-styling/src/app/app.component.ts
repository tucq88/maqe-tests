import { Post } from './models/post.model';
import { PostService } from './services/post.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {
  posts: Post[];

  public constructor(private postService: PostService) {
    //
  }

  ngOnInit() {
    this.posts = this.postService.all();
  }
}
