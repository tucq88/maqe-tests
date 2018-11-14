import { Author } from './../models/author.model';
import { Injectable } from '@angular/core';
import * as authorsJson from '../../assets/authors.json';

@Injectable()
export class AuthorService {

  constructor() { }

  all(): Author[] {
    return (authorsJson as any).default.map(author => new Author().deserialize(author));
  }
}
