import { Post } from './../models/post.model';
import { AuthorService } from './author.service';
import { Injectable } from '@angular/core';
import * as postsJson from '../../assets/posts.json';

@Injectable()
export class PostService {

  constructor(private authorService: AuthorService) {
    //
  }

  all(): Post[] {
    const authors = this.authorService.all();
    return (postsJson as any).default.map(postJson => {
      const post = new Post().deserialize(postJson);
      post.author = authors.find(author => author.id === postJson.author_id);
      return post;
    });
  }
}
