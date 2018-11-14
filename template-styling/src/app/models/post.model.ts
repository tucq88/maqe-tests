import { Author } from './author.model';
import parse from 'date-fns/parse';

export class Post {
  id: number;
  author: Author|null;
  title: string;
  body: string;
  image_url: string;
  created_at: Date

  deserialize(input): Post {
    Object.assign(this, input);
    this.created_at = parse(input.created_at);
    return this;
  }
}
