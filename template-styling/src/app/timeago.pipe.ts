import { Pipe, PipeTransform } from '@angular/core';
import distanceInWords from 'date-fns/distance_in_words'

@Pipe({
  name: 'timeago'
})
export class TimeagoPipe implements PipeTransform {

  transform(value: Date, args?: any): string {
    let timeago = distanceInWords(new Date(value), new Date());
    return timeago.replace('in ', '').replace('about ', '') + ' ago';
  }

}
