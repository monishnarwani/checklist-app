<template>
    <div>
        <div class="form-group">
            <label for="checklist-name">Checklist Name:</label>
            <input type="text" id="checklist-name" placeholder="Enter Checklist Name" class="form-control" v-model="checklistName">
        </div>

        <div class="form-group">
            <!--suppress XmlInvalidId -->
            <label for="cheklist-items">Checklist Items:</label>
            <multi-select
                    id="checklist-items"
                    track-by="id"
                    v-model="selectedItems"
                    :options="items"
                    label="name"
                    :multiple="true"
                    tag-placeholder="Add this as new item"
                    :taggable="true"
                    @tag="addItem"
            ></multi-select>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <th>Sr. No.</th>
                <th>Item Name</th>
            </thead>
            <tbody>
                <tr v-for="(item, key) in selectedItems">
                    <td>{{key+1}}</td>
                    <td>{{item.name}}</td>
                </tr>
            </tbody>
        </table>

        <div class="form-group">
            <button class="btn btn-success" @click="saveChecklist">Save</button>
            <button class="btn btn-warning">Cancel</button>
        </div>
    </div>
</template>

<script>
  import MultiSelect from 'vue-multiselect'
  import {
    getItems,
    createChecklist
  } from "./config";

  export default {
    created () {
      axios.get(getItems).then(response => {
        this.items = response.data.data
      })
    },
    data () {
      return {
        checklistName: '',
        items: [],
        selectedItems: null,
      }
    },
    components: {
      MultiSelect
    },
    methods: {
      addItem (newItem) {
        var item = {
          name: newItem
        }
        this.items.push(item)
        this.selectedItems.push(item)
      },
      saveChecklist () {

      }
    }
  }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
    .multiselect__tag {
        display: none;
    }
</style>