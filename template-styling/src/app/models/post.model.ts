export class Post {
  id: number;
  author: number;
  title: string;
  body: string;
  image_url: string;
  created_at: Date

  deserialize(input): Post {
    Object.assign(this, input);
    return this;
  }
}
