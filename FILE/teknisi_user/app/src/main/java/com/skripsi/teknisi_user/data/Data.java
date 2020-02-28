package com.skripsi.teknisi_user.data;

public class Data {

    private String id, kegiatan;

    public Data(){
    }

    public Data(String id, String kegiatan) {
        this.id = id;
        this.kegiatan = kegiatan;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getkegiatan() {
        return kegiatan;
    }

    public void setkegiatan(String kegiatan) {
        this.kegiatan = kegiatan;
    }
}
