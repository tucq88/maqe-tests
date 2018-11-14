export class Author {
  id: number;
  name: string;
  role: string;
  place: string;
  avatar_url: string;

  deserialize(input): Author {
    Object.assign(this, input);
    return this;
  }
}
