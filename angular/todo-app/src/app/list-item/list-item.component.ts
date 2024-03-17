import { Component, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'list-item',
  standalone: true,
  imports: [],
  templateUrl: './list-item.component.html',
  styleUrl: './list-item.component.css',
})
export class ListItemComponent {
  @Input() title = '';
  @Input() category = '';
  @Input() isDone = false;
  @Input() id = 0;

  @Output() removeItem = new EventEmitter<any>();
  @Output() toggleItem = new EventEmitter<any>();

  remove(id: number) {
    this.removeItem.emit(this.id);
  }

  toggle(id: number) {
    this.toggleItem.emit(this.id);
  }
}
