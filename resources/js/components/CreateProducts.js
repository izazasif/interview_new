import React, { useState, useEffect  } from 'react';
import Axios from "axios";




function CreateProducts () {

    return(
       
           
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" v-model="product_name" placeholder="Product Name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="">Product SKU</label>
                                <input type="text" v-model="product_sku" placeholder="Product Name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea v-model="description" id="" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Media</h6>
                        </div>
                        <div class="card-body border">
                            
                        </div>
                    </div>
                </div>
    );

}



export default CreateProducts;