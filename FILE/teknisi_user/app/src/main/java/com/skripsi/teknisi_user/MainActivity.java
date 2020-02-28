package com.skripsi.teknisi_user;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.skripsi.teknisi_user.teknisi.Edit_profile;
import com.skripsi.teknisi_user.teknisi.History_laporan;
import com.skripsi.teknisi_user.teknisi.Jadwal_piket;
import com.skripsi.teknisi_user.teknisi.Kinerja_teknisi;
import com.skripsi.teknisi_user.teknisi.Laporan_pekerjaan;

public class MainActivity extends AppCompatActivity {

    Button btn_logout, btn_laporan_kerja, btn_history_laporan, btn_jadwal_piket, btn_kinerja_teknisi;
    ImageButton logo;
    TextView txt_username;
    String username, id;
    SharedPreferences sharedpreferences;

    public static final String TAG_ID = "id";
    public static final String TAG_USERNAME = "username";

    public static final String my_shared_preferences = "my_shared_preferences";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        txt_username = (TextView) findViewById(R.id.txt_username);
        btn_logout = (Button) findViewById(R.id.btn_logout);
        btn_laporan_kerja = (Button) findViewById(R.id.btn_laporan_kerja);
        btn_history_laporan = (Button) findViewById(R.id.btn_history_laporan);
        btn_jadwal_piket = (Button) findViewById(R.id.btn_jadwal_piket);
        btn_kinerja_teknisi = (Button) findViewById(R.id.btn_kinerja_teknisi);
        logo = (ImageButton) findViewById(R.id.logo);

        sharedpreferences = getSharedPreferences(Login.my_shared_preferences, Context.MODE_PRIVATE);
        username = getIntent().getStringExtra(TAG_USERNAME);

        txt_username.setText("USERNAME : " + username);

        btn_logout.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                // TODO Auto-generated method stub
                // update login session ke FALSE dan mengosongkan nilai id dan username
                SharedPreferences.Editor editor = sharedpreferences.edit();
                editor.putBoolean(Login.session_status, false);
                editor.putString(TAG_USERNAME, null);
                editor.commit();

                Intent intent = new Intent(MainActivity.this, Login.class);
                finish();
                startActivity(intent);
            }
        });

    }

    public void Laporan_pekerjaan(View view) {
        Intent intent = new Intent(MainActivity.this, Laporan_pekerjaan.class);
        startActivity(intent);
    }

    public void History_laporan(View view) {
        Intent intent = new Intent(MainActivity.this, History_laporan.class);
        startActivity(intent);
    }

    public void Jadwal_piket(View view) {
        Intent intent = new Intent(MainActivity.this, Jadwal_piket.class);
        startActivity(intent);
    }

    public void Kinerja_teknisi(View view) {
        Intent intent = new Intent(MainActivity.this, Kinerja_teknisi.class);
        startActivity(intent);
    }

    public void Edit_profile(View view){
        sharedpreferences = getSharedPreferences(my_shared_preferences, Context.MODE_PRIVATE);
        id = sharedpreferences.getString(TAG_ID, null);
        username = sharedpreferences.getString(TAG_USERNAME, null);

            Intent intent = new Intent(MainActivity.this, Edit_profile.class);
            intent.putExtra(TAG_ID, id);
            intent.putExtra(TAG_USERNAME, username);
            startActivity(intent);
    }
}